# wx-dashboard
Dashboard for quick and easy access of APRS weather object data.

## Getting Started
1. Fork and clone repository.
2. `cd wx-dashboard` and `vagrant up`
    (If using VMware Fusion, use `vagrant up --provider=vmware_fusion` the first time.)
3. Once provisioning is complete, `vagrant ssh` and `cd /vagrant/www`
4. Load schema: `app/console doctrine:schema:update --force`
5. Load test/dev data: `app/console doctrine:fixtures:load`
6. Add your aprs.fi key to `src/Ecwec/Bundle/CoreBundle/Controller/DefaultController.php`
7. Open your browser to [http://wx-dashboard.local/app_dev.php](http://wx-dashboard.local/app_dev.php).