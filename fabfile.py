from tools.fablib import *

from fabric.api import task

"""
Getting set up for the first time and using vim?
Run:
    :%s/nmindepth/project_name/g       # name for the project, used as the database name. This should match the umbrella repository name and the domain.wpengine.com name
    :%s/NMINDEPTH/YOUR_SITE_ENV_VAR/g      # environment variable slug from INN's secrets repository
"""

"""
Base configuration
"""
env.project_name = 'nmindepth'
env.hosts = ['localhost', ]
env.sftp_deploy = True # needed for wpengine
env.domain = 'nmindepth.dev'

# Environments
@task
def production():
    """
    Work on production environment
    """
    env.settings    = 'production'
    env.hosts       = [ os.environ[ 'NMINDEPTH_PRODUCTION_SFTP_HOST' ], ]   # ssh host for production.
    env.user        = os.environ[ 'NMINDEPTH_PRODUCTION_SFTP_USER' ]        # ssh user for production.
    env.password    = os.environ[ 'NMINDEPTH_PRODUCTION_SFTP_PASSWORD' ]    # ssh password for production.
    env.domain      = 'nmindepth.wpengine.com'
    env.port        = '2222'


@task
def staging():
    """
    Work on staging environment
    """
    env.settings    = 'staging'
    env.hosts       = [ os.environ[ 'NMINDEPTH_STAGING_SFTP_HOST' ], ]   # ssh host for production.
    env.user        = os.environ[ 'NMINDEPTH_STAGING_SFTP_USER' ]       # ssh user for production.
    env.password    = os.environ[ 'NMINDEPTH_STAGING_SFTP_PASSWORD' ]    # ssh password for production.
    env.domain      = 'nmindepth.staging.wpengine.com'
    env.port        = '2222'

try:
    from local_fabfile import  *
except ImportError:
    pass
