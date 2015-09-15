<?php

use rk\frontend_helper\FrontendHelper;

?>

<footer class="content-info" role="contentinfo">
  <div class="footer-container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
      <ul class="footer-container__list">
          <li class="sitemap footer-container__list--section first">
              <h3><?php _e('Site map', 'sage') ?></h3>
              <div class="category-list-footer">
                  <ul>
                      <?php FrontendHelper::render_footer_links(array(2,14,27,20,22)) ?>
                  </ul>
              </div>
          </li>
          <li class="services footer-container__list--section">
              <h3><?php _e('Services', 'sage') ?></h3>
              <div class="category-list-footer">
                  <ul>
                      <?php FrontendHelper::render_footer_links(array(36,38,40,42)) ?>
                  </ul>
              </div>
          </li>
          <li class="footer-container__contact footer-container__list--section last">
              <h3 class="contact__title"><?php _e('Contact', 'sage') ?></h3>
              <p>
                  Ján Pavlik<br/>
                  U Vápenky 163<br/>
                  Krupka - Vrchoslav<br/>
                  Teplice 417 41<br/>
                  Czech Republic
              </p>
              <p>
                  <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;<a href="mailto:janko.pavlik@seznam.cz">janko.pavlik@seznam.cz</a><br/>
                  <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;+420&nbsp;720&nbsp;546&nbsp;667
              </p>
          </li>

      </ul>
      <div class="credentials">
          <span class="created_by">Created by: Jakub Adler (2015)</span>
          <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
          <a href="mailto:adler.jakub@gmail.com">adler.jakub@gmail.com</a>
      <div>
  </div>
</footer>
