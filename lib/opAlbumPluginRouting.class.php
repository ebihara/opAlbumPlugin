<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * Album routing.
 *
 * @package    OpenPNE
 * @author     Hiroki Mogi <mogi@tejimaya.net>
 */
class opAlbumPluginRouting
{
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $routing = $event->getSubject();

    $routes = array(
      // album
      'album_index' => new sfRoute(
        '/album',
        array('module' => 'album', 'action' => 'index')
      ),
      'album_list' => new sfRoute(
        '/album/list',
        array('module' => 'album', 'action' => 'list')
      ),
      'album_list_member' => new sfDoctrineRoute(
        '/album/listMember/:id',
        array('module' => 'album', 'action' => 'listMember'),
        array('id' => '\d+'),
        array('model' => 'Member', 'type' => 'object')
      ),
      'album_new' => new sfRoute(
        '/album/new',
        array('module' => 'album', 'action' => 'new')
      ),
      'album_show' => new sfDoctrineRoute(
        '/album/:id',
        array('module' => 'album', 'action' => 'show'),
        array('id' => '\d+'),
        array('model' => 'Album', 'type' => 'object')
      ), 
      'album_create_confirm' => new sfRequestRoute(
        '/album/createConfirm/:id',
        array('module' => 'album', 'action' => 'createConfirm'),
        array('model' => 'Album', 'type' => 'object')
      ),
      'album_create' => new sfRequestRoute(
        '/album/create',
        array('module' => 'album', 'action' => 'create'),
        array('sf_method' => array('post'))
      ),
       'album_edit' => new sfDoctrineRoute(
        '/album/edit/:id',
        array('module' => 'album', 'action' => 'edit'),
        array('id' => '\d+'),
        array('model' => 'Album', 'type' => 'object')
      ),
       'album_update' => new sfDoctrineRoute(
        '/album/update/:id',
        array('module' => 'album', 'action' => 'update'),
        array('id' => '\d+', 'sf_method' => array('post')),
        array('model' => 'Album', 'type' => 'object')
      ),
      'album_delete_confirm' => new sfDoctrineRoute(
        '/album/deleteConfirm/:id',
        array('module' => 'album', 'action' => 'deleteConfirm'),
        array('id' => '\d+'),
        array('model' => 'Album', 'type' => 'object')
      ),
      'album_delete' => new sfDoctrineRoute(
        '/album/delete/:id',
        array('module' => 'album', 'action' => 'delete'),
        array('id' => '\d+', 'sf_method' => array('post')),
        array('model' => 'Album', 'type' => 'object')
      ),

      // album image
      'album_image_add' => new sfDoctrineRoute(
        '/album/:id/photo/add',
        array('module' => 'albumImage', 'action' => 'add'),
        array('id' => '\d+'),
        array('model' => 'Album', 'type' => 'object')
      ), 
      'album_image_insert' => new sfDoctrineRoute(
        '/album/:id/photo/insert',
        array('module' => 'albumImage', 'action' => 'insert'),
        array('id' => '\d+', 'sf_method' => array('post')),
        array('model' => 'Album', 'type' => 'object')
      ),

     'album_nodefaults' => new sfRoute(
        '/album/*',
        array('module' => 'default', 'action' => 'error')
      ),
    );  

    $routes = array_reverse($routes);
    foreach ($routes as $name => $route)
    {   
      $routing->prependRoute($name, $route);
    }   
  }
}
