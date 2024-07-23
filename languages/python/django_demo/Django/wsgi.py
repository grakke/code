"""
WSGI config for Django project.

It exposes the WSGI callable as a module-level variable named ``application``.

For more information on this file, see
https://docs.djangoproject.com/en/dev/howto/deployment/wsgi/
"""

import os

from django.core.wsgi import get_wsgi_application

STATIC_ROOT = os.path.join(BASE_DIR, "static/")

os.environ.setdefault("DJANGO_SETTINGS_MODULE", "Django.settings")

application = get_wsgi_application()
