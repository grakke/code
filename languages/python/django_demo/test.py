# test.py
def application(env, start_response):
    uwsgi.reload()
    start_response('200 OK', [('Content-Type','text/html')])
    return [b"Hello World"] # python3
