# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  #config.vm.box = "hashicorp/precise64"
  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"
  
  # Disable automatic box update checking. If you disable this, then
  # boxes will only be checked for updates when the user runs
  # `vagrant box outdated`. This is not recommended.
  # config.vm.box_check_update = false

  # Networking details
  config.vm.hostname = "wx-dashboard.local"
  config.vm.network :private_network, ip: "192.168.56.150"
  config.ssh.forward_agent = true
  config.vm.network "forwarded_port", guest_ip: "10.0.2.15", guest: 3306, host: 33306

  config.vm.synced_folder ".", "/vagrant", type: "nfs"

  config.hostmanager.enabled = true
  config.hostmanager.manage_host = true
  config.hostmanager.ignore_private_ip = false
  config.hostmanager.include_offline = true

  # Enable provisioning with Puppet stand alone.  Puppet manifests
  # are contained in a directory path relative to this Vagrantfile.
  # You will need to create the manifests directory and a manifest in
  # the file default.pp in the manifests_path directory.
  #
  config.vm.provision "puppet" do |puppet|
    puppet.manifests_path = "puppet/manifests"
    puppet.module_path = "puppet/modules"
  end
end
