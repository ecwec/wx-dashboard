# wx-dashboard
Dashboard for quick and easy access of APRS weather object data.

## Getting Started
1. Fork and clone repository.
2. Install vagrant-hostmanager plugin: `vagrant plugin install vagrant-hostmanager`
3. `cd wx-dashboard` and `vagrant up`
    (If using VMware Fusion, use `vagrant up --provider=vmware_fusion` the first time.)
4. Once provisioning is complete, `vagrant ssh` and `cd /vagrant/www`
5. Load schema: `app/console doctrine:schema:update --force`
6. Load test/dev data: `app/console doctrine:fixtures:load`
7. Add your aprs.fi key to `src/Ecwec/Bundle/CoreBundle/Controller/DefaultController.php`
8. Open your browser to [http://wx-dashboard.local/app_dev.php](http://wx-dashboard.local/app_dev.php).