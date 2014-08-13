set :stages, %w(beta)
set :default_stage, "beta"
set :stage_dir, "app/config/deploy"
require 'capistrano/ext/multistage'

set :application, "beta.secretmates"
set :app_path,    "app"

set :user, "root"

set :scm, :git
set :repository, "https://github.com/nater1067/SM.git"
set :domain,      "#{application}.com"
set :deploy_to,   "/var/www/#{domain}"

set :use_composer, true
#set :update_vendors, true
set :copy_vendors, true

set :writable_dirs,       ["app/cache", "app/logs"]
set :webserver_user,      "www-data"
set :permission_method,   :acl
set :use_set_permissions, true
set :shared_files,      ["app/config/parameters.yml"]
set :shared_children,     [app_path + "/cache", app_path + "/logs", web_path + "/uploads", "vendor"]
set :clear_controllers,     true
set :controllers_to_clear, ['app_*.php']

task :uname do
    run "uname -a"
end