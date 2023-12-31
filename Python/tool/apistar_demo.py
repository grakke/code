from apistar import App, Route


def welcome(name=None):
    if name is None:
        return {'message': 'Welcome to apistar!'}
    return {'message': 'Welcome to apistar, %s!' % name}


routes = [
    Route('/', method='GET', handler=welcome),
]

app = App(routes=routes)

if __name__ == '__main__':
    app.serve('127.0.0.1', 5000, debug=True)
