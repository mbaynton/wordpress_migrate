<?php
namespace Drupal\wordpress_migrate\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\XmlBase;
use Drupal\migrate\Entity\MigrationInterface;

/**
 * Description of WordPressItemSource
 *
 * @MigrateSource(
 *   id = "wordpress_comment_source"
 * )
 */
class WordPressCommentSource extends XmlBase {
  
  public function fields() {
    return array(
      '..\wp:post_id' => 'Post Id comment is attached to',
      'wp:comment_id' => 'Comment Id',
      'wp:comment_author' => 'Author\'s name',
      'wp:comment_author_email' => 'Author\'s email',
      'wp:comment_author_url' => 'Author\'s URL',
      'wp:comment_author_IP' => 'Author\'s IP address',
      'wp:comment_date' => 'Comment date',
      'wp:comment_date_gmt' => 'Comment date in GMT',
      'wp:comment_content' => 'Comment content',
      'wp:comment_approved' => 'Comment approved status (1 is approved)',
      'wp:comment_parent' => 'Comment parent',
    );
  }
  
  public function getIds() {
    $ids['wp:comment_id']['type'] = 'integer';
    $ids['wp:comment_id']['alias'] = 'c';
    return $ids;
  }
  
  public function namespaces() {
    return array(
        'wp' => 'http://wordpress.org/export/1.2/'
    );
  }
}
