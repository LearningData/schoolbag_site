set :stage, :staging

set :deploy_to, '/home/azureuser/apps/schoolbag_site'

ask :branch, proc {
  `git tag`.split("\n").last
}

server 'learningdata.net',
       user: 'azureuser',
       roles: %w{app},
       ssh_options: {
         port: 3535,
         user: 'azureuser',
         forward_agent: false,
       }
