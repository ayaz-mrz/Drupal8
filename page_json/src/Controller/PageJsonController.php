<?php

namespace Drupal\page_json\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Class PageJsonController.
 */
class PageJsonController extends ControllerBase {

  /**
   * Page json output.
   *
   * @return string
   *   Return output node as a Json.
   */
  public function page_json_output($apikey, $node) {
    if ($node->getType() == 'page') {
      $jsonData = array('type' => $node->getType(), 'id' => $node->Id(), 'title' => $node->getTitle() , 'body' => $node->get('body')->value);
      return new JsonResponse($jsonData);
    }
    else {
      throw new AccessDeniedHttpException();
    }
  }

}
