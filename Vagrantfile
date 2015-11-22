# -*- mode: ruby -*-
# vi: set ft=ruby :

%w{ vagrant-hostmanager vagrant-auto_network }.each do |plugin|
    unless Vagrant.has_plugin?(plugin)
        raise "#{plugin} plugin is not installed. Please install with: vagrant plugin install #{plugin}"
    end
end

project = "wx-dashboard"
hostname = "#{project}.local"

Vagrant.configure(2) do |config|

  config.vm.define project do |dev|
    dev.vm.box = "boxcutter/ubuntu1404"
    dev.vm.box_version = ">= 2.0, < 3.0"

    dev.vm.provider "vmware_fusion" do |vm|
        vm.vmx["memsize"] = "512"
    end

    dev.vm.provider "virtualbox" do |vb|
      vb.customize ["modifyvm", :id, "--memory", 512]
    end

    dev.vm.hostname = hostname
    dev.hostmanager.enabled = true
    dev.hostmanager.manage_host = true

    dev.vm.network "private_network", :auto_network => true

    dev.ssh.forward_agent = true
    dev.vm.synced_folder ".", "/vagrant", type: "nfs"
    dev.vm.synced_folder "./www", "/var/www/#{hostname}", type: "nfs"
  end

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "provisioning/lamp.yml"
    ansible.groups = {
      "dev" => project,
    }
  end
end
