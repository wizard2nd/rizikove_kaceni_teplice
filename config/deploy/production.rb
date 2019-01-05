set :stage, :production

server "rizikovekaceni-teplice.production.goodcodecrusader.com", 
user: "git", 
roles: %w{app web db},
ssh_options: {
	user: "git",
	forward_agent: true,
	keys: "~/.ssh/do_git"
}

set :wpcli_remote_url, 'http://rizikovekaceni-teplice.production.goodcodecrusader.com'

#
# Global options
# --------------
#  set :ssh_options, {
#    keys: %w(/home/rlisowski/.ssh/id_rsa),
#    forward_agent: false,
#    auth_methods: %w(password)
#  }
#
# The server-based syntax can be used to override options:
# ------------------------------------
# server "example.com",
#   user: "user_name",
#   roles: %w{web app},
#   ssh_options: {
#     user: "user_name", # overrides user setting above
#     keys: %w(/home/user_name/.ssh/id_rsa),
#     forward_agent: false,
#     auth_methods: %w(publickey password)
#     # password: "please use keys"
#   }
