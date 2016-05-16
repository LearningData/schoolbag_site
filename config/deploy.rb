# config valid only for current version of Capistrano
lock '3.4.0'

set :application, 'schoolbag_site'
set :repo_url, 'git@github.com:LearningData/schoolbag_site.git'

# Default branch is :master
# ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default deploy_to directory is /var/www/my_app_name
set :deploy_to, '/home/azureuser/apps/schoolbag_site'

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

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for keep_releases is 5
set :keep_releases, 3

namespace :deploy do

  task :build_jekyll do
    on roles(:app) do
      within "#{deploy_to}/current" do
        case fetch(:stage)
        when :demo
          url = "http://demo.learningdata.net/schoolbag"
        when :staging
          url = "http://demo.learningdata.net/schoolbag2"
        when :training
          url = "http://training.learningdata.net/schoolbag"
        when :production
          url = "https://schoolbag.ie/schoolbag"
        end

        execute :jekyll, "build"
      end
    end
  end

  after "deploy:symlink:release", "deploy:build_jekyll"
end
