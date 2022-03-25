<?php

declare(strict_types=1);

/*
 * This file is part of Contao Slick Bundle.
 *
 * (c) Jannik Nölke (https://jaynoe.de)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jaynoe\ContaoSlickBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Contao\System;
use Contao\BackendTemplate;

/**
 * @ContentElement(category="slider")
 */
class SlickWrapperStartController extends AbstractContentElementController
{

    protected string $config;

    protected function getResponse(Template $template, ContentModel $model, Request $request): ?Response
    {

        $request = System::getContainer()->get('request_stack')->getCurrentRequest();
        if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
            $template = new BackendTemplate('be_wildcard');
            return $template->getResponse();
        }

        $this->config = '{"slidesToShow": '.$model->slick_slidesToShow.', "slidesToScroll": '.$model->slick_slidesToScroll;
        if($model->slick_speed && $model->slick_speed != 0) {
            $this->config .= ', "speed": '.$model->slick_speed;
        }
        if($model->slick_autoplaySpeed && $model->slick_autoplaySpeed != 0) {
            $this->config .= ', "autoplay": true, "autoplaySpeed": '.$model->slick_autoplaySpeed;
        }
        if($model->slick_initialSlide && $model->slick_initialSlide != 0) {
            $this->config .= ', "initialSlide": '.$model->slick_initialSlide;
        }
        if($model->slick_arrows) {
            $this->config .= ', "arrows": true';
        }
        if($model->slick_dots) {
            $this->config .= ', "dots": true';
        }
        if($model->slick_infinite) {
            $this->config .= ', "infinite": true';
        }
        if($model->slick_centerMode) {
            $this->config .= ', "centerMode": true';
            if($model->slick_centerPadding && $model->slick_centerPadding != 0) {
                $this->config .= ', "centerPadding": "'.$model->slick_centerPadding;
            }
        }
        if(!empty($model->slick_responsive)) {
            $responsive = unserialize($model->slick_responsive);
            if(!empty($responsive[0]['breakpoint'])) {
                $loops = count($responsive);
                $this->config .= ', "responsive": [';
                dump($loops);
                $i=1;
                foreach($responsive as $r) {
                    $this->config .= '{ "breakpoint": '.$r['breakpoint'].',';
                    $this->config .= '"settings": { '.$r['responsive_settings'].' }';
                    $this->config .= ' }';
                    if($i < $loops) {
                        $this->config .= ',';
                    }
                    $i++;
                }
                $this->config .= ']';
            }
        }
        $this->config .= '}';

        $template->config = $this->config;

        return $template->getResponse();
    }
}