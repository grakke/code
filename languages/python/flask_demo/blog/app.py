from flask import Flask, jsonify, request

from blog.commands import CreateArticleCommand
from blog.queries import GetArticleByIDQuery, ListArticlesQuery
from pydantic import ValidationError

app = Flask(__name__)


@app.route('/articles/', methods=['POST'])
def create_article():
    cmd = CreateArticleCommand(
        **request.json
    )
    return jsonify(cmd.execute().dict())


@app.route('/articles/<article_id>/', methods=['GET'])
def get_article(article_id):
    query = GetArticleByIDQuery(
        id=article_id
    )
    return jsonify(query.execute().dict())


@app.route('/articles/', methods=['GET'])
def list_articles():
    query = ListArticlesQuery()
    records = [record.dict() for record in query.execute()]
    return jsonify(records)


@app.errorhandler(ValidationError)
def handle_validation_exception(error):
    response = jsonify(error.errors())
    response.status_code = 400
    return response


if __name__ == '__main__':
    app.run()
