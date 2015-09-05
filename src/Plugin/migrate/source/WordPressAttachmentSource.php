<?php
namespace Drupal\wordpress_migrate\Plugin\migrate\source;

/**
 * Description of WordPressAttachmentSource
 *
 * @MigrateSource(
 *   id = "wordpress_attachment_source"
 * )
 */
class WordPressAttachmentSource extends WordPressItemSource {
  
  public function fields() {
    return parent::fields() + array(
      'wp:attachment_url' => 'Attachment URL',
    );
  }
  
}
