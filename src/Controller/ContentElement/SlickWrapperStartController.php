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

/**
 * @ContentElement(category="slider")
 */
class SlickWrapperStartController extends AbstractContentElementController
{

    protected $config;

    protected function getResponse(Template $template, ContentModel $model, Request $request): ?Response
    {
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
        $this->config .= '}';

        $template->config = $this->config;

        return $template->getResponse();
    }
}