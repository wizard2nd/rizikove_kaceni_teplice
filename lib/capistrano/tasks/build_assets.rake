namespace :assets do
  desc 'Install bower dependencies'
  task :bower_install do
    on roles(:app) do
      within release_path.join(fetch(:theme_dir)) do
      	execute :bower, :install, '--silent'	
      end
    end  
  end

  desc 'Build assets'
  task :build do
    on roles(:app) do
      within release_path.join(fetch(:theme_dir)) do
      	execute :grunt, :build	
      end
    end
  end

  before 'deploy:updated', 'assets:bower_install'
  before 'deploy:updated', 'assets:build'
end