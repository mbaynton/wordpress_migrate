<?php


/**
 * @file
 * Contains \Drupal\wordpress_migrate\Plugin\migrate\process\DefaultValue.
 */

namespace Drupal\wordpress_migrate\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;


/**
 * This plugin sets missing values on the destination.
 *
 * @MigrateProcessPlugin(
 *   id = "wordpress_attachment_uri_process"
 * )
 */
class WordPressAttachmentUriProcess extends ProcessPluginBase {


  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    $wp_uri = $row->getSource()['wp:attachment_url'];
    $search = '/wp-content/uploads/';
    $uploads_dir_pos = strpos($wp_uri, $search);
    if($uploads_dir_pos !== false) {
      return 'public://' . substr($wp_uri, $uploads_dir_pos + strlen($search));
    } else {
      // hmm.
      return 'public://' . basename($wp_uri);
    }
  }
}
