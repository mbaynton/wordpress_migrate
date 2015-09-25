Using this code is very rough around the edges at present. To start a migration:
 - Install/enable the migrate_plus and migrate_tools modules. This gives you the drush migrate-manifest command.
 - Create a migrate manifest, such as <code>$ echo '- wp_post' > ~/my-manifest</code>
 - Either place your wordpress xml file at the location defined in <code>config/install/migrate.migration.wp_post.yml</code>, or edit this file to change the location.
 - Apply the patch at https://www.drupal.org/node/2500955. You can remove it after the migration has run.
 - Enable this wordpress_migrate module.
 - Run the command <code>drush migrate-manifest --legacy-db-url=foo ~/my-manifest</code>

See https://github.com/mbaynton/mixingbowl_migrate for an example of the remaining, custom pieces I needed to do a complete site migration.
