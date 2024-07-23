from typing import List

from pydantic import BaseModel

from src.blog.models import Article


class ListArticlesQuery(BaseModel):
    id: str

    def execute(self) -> Article:
        article = Article.get_by_id(self.id)

        return article
