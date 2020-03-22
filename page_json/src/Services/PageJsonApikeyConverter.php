<?php

namespace Drupal\page_json\Services;

use Drupal\Core\ParamConverter\ParamConverterInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Class PageJsonApikeyConverter.
 */
class PageJsonApikeyConverter implements ParamConverterInterface {

  /**
   * {@inheritdoc}
   */
  public function convert($value, $definition, $name, array $defaults) {
    $siteapikey = \Drupal::config('page_json.apikey')->get('siteapikey');
    if(!empty($siteapikey) && $siteapikey == $value) {
      return $siteapikey;
    }
    else {
      throw new AccessDeniedHttpException();
    }
  }

  /**
   * {@inheritdoc}
   */
  public function applies($definition, $name, Route $route) {
    return (!empty($definition['type']) && $definition['type'] == 'apikey');
  }

}
