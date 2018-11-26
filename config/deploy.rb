# config valid for current version and patch releases of Capistrano
lock "~> 3.11.0"

set :application, "rizikove_kaceni_teplice"
set :repo_url, "git@github.com:wizard2nd/rizikove_kaceni_teplice.git"

# Default branch is :master
ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default deploy_to directory is /var/www/my_app_name
set :deploy_to, "/home/git/apps/rizikovekaceni/staging"

# Insltall Composer
SSHKit.config.command_map[:composer] = "php #{shared_path.join("composer.phar")}"

namespace :deploy do
  after :starting, 'composer:install_executable'
  after :updated, 'set:env_file'

  before :updated, 'assets:bower_install'
  before :updated, 'assets:build'
end

set :deploy_via, :remote_cache
set :theme_dir, './web/app/themes/rizikove_kaceni_sage_based'

set :npm_target_path, -> { release_path.join(fetch(:theme_dir)) }
set :npm_flags, '--silent --no-progress'

namespace :set do
  desc 'Create symlink to .env file'
  task :env_file do
  	on roles(:app) do
  	  within release_path do
  	  	execute "ln -s #{shared_path}/.env #{release_path}/.env" 	
  	  end
  	end
  end
end

# Default value for :format is :airbrussh.
# set :format, :airbrussh

# You can configure the Airbrussh format using :format_options.
# These are the defaults.
# set :format_options, command_output: true, log_file: "log/capistrano.log", color: :auto, truncate: :auto

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
# append :linked_files, "config/database.yml"

# Default value for linked_dirs is []
# append :linked_dirs, "log", "tmp/pids", "tmp/cache", "tmp/sockets", "public/system"

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for local_user is ENV['USER']
# set :local_user, -> { `git config user.name`.chomp }

# Default value for keep_releases is 5
# set :keep_releases, 5

# Uncomment the following to require manually verifying the host key before first deploy.
# set :ssh_options, verify_host_key: :secure