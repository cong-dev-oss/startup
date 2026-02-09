<?php
/**
 * Custom User Roles
 *
 * @package MyCore_Plugin
 */

if (!defined('ABSPATH')) {
    exit;
}

class MyCore_User_Roles {

    public static function init() {
        // Roles are added on activation; optionally sync caps on init
    }

    public static function add_roles_on_activation() {
        // Project Manager: quản lý nội dung (post, page, product, portfolio, event dùng capability_type post)
        add_role(
            'project_manager',
            __('Project Manager', 'mycore-plugin'),
            [
                'read'                   => true,
                'edit_posts'             => true,
                'delete_posts'           => true,
                'publish_posts'          => true,
                'edit_pages'             => true,
                'edit_others_posts'      => true,
                'edit_others_pages'      => true,
                'delete_others_posts'    => false,
                'delete_others_pages'    => false,
                'manage_categories'      => true,
                'upload_files'           => true,
            ]
        );

        add_role(
            'client',
            __('Client', 'mycore-plugin'),
            [
                'read' => true,
            ]
        );
    }
}
