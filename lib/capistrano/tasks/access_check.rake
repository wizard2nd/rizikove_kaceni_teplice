desc "Check that we have write access"
task :check_write_permissions do
  on roles(:all) do |host|
  	if test("[ -w #{fetch(:deploy_to)} ]")
      info "Directory: `#{fetch(:deploy_to)}' is writable on #{host}"
    else
      error "Directory: `#{fetch(:deploy_to)}'' is not writable on #{host}"
    end
  end	
end