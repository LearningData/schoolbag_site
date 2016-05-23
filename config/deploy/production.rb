set :stage, :production

set :deploy_to, '/home/azureuser/schoolbag_site'

ask :branch, proc {
  `git tag`.split("\n").last
}

server 'schoolbag.cloudapp.net',
       user: 'azureuser',
       roles: %w{app},
       ssh_options: {
         port: 3535,
         user: 'azureuser',
         forward_agent: false,
         keys: [File.join(ENV["HOME"], "security-keys", "azure.key")]
       }
