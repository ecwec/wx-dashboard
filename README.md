# wx-dashboard
Dashboard for quick and easy access of APRS weather object data.

## Getting Started
1. Fork and clone repository.
1. Install vagrant-hostmanager plugin: `vagrant plugin install vagrant-hostmanager`
1. Install vagrant-hostmanager plugin: `vagrant plugin install vagrant-auto_network`
1. `cd wx-dashboard` and `vagrant up`
    (If using VMware Fusion, use `vagrant up --provider=vmware_fusion` the first time.)
1. Once provisioning is complete, `vagrant ssh` and `cd /var/www/wx-dashboard.local/`
1. Load schema: `app/console doctrine:schema:update --force`
1. Load test/dev data: `app/console doctrine:fixtures:load`
1. Add your aprs.fi key to `src/Ecwec/Bundle/CoreBundle/Controller/DefaultController.php`
1. Open your browser to [http://wx-dashboard.local/app_dev.php](http://wx-dashboard.local/app_dev.php).
