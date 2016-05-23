# config valid only for current version of Capistrano
lock '3.4.0'

# github-site is defined in .ssh/config
set :application, 'schoolbag_site'
set :repo_url, 'git@github-site:LearningData/schoolbag_site.git'
set :use_sudo, false

# Default branch is :master
# ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default deploy_to directory is /var/www/my_app_name
set :deploy_to, '/home/azureuser/schoolbag_site'

# Default value for :scm is :git
set :scm, :git

# Default value for :format is :pretty
# set :format, :pretty

# Default value for :log_level is :debug
# set :log_level, :debug

# Default value for :pty is false
set :pty, true

# Default value for :linked_files is []
# set :linked_files, fetch(:linked_files, []).push('config/database.yml', 'config/secrets.yml')

# Default value for linked_dirs is []
# set :linked_dirs, fetch(:linked_dirs, []).push('log', 'tmp/pids', 'tmp/cache', 'tmp/sockets', 'vendor/bundle', 'public/system')

set :rvm1_ruby_version, "2.3.0"

# Default value for default_env is {}
set :default_env, {
      path: "/usr/local/bin:/usr/local/rvm/gems/ruby-2.3.0/bin:/usr/local/rvm/gems/ruby-2.3.0@global/bin:/usr/local/rvm/rubies/default/bin:$PATH",
      gem_home: "/usr/local/rvm/gems/ruby-2.3.0",
      gem_path: "/usr/local/rvm/gems/ruby-2.3.0"
    }
#set :default_env, -> {{ path: [fetch(:gem_path), "/usr/local/rvm/gems/ruby-2.3.0@global/bin", "/usr/local/rvm/rubies/ruby-2.3.0/bin", "/usr/local/rvm/bin", "#{release_path}/bin", "$PATH"].join(":") }}

# Default value for keep_releases is 5
set :keep_releases, 3

namespace :deploy do

  desc "Quick test of the enviroment path"
  task :test_env do
    on roles(:app) do
      execute "echo $PATH"
    end
  end

  desc "Run Jekyll to build the static site"
  task :build_jekyll do
    on roles(:app) do
      within "#{deploy_to}/current" do
        execute :jekyll, "build"
      end
    end
  end

  if fetch(:stage) != :production
    before "deploy:build_jekyll", "rvm1:hook"
    after :finishing, "deploy:build_jekyll"
  end
  
end

