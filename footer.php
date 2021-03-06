<?php wp_footer(); ?>
    <!-- footer start here -->
    <div class="agilebg-footer">
        <div class="footer">
            <div class="container">
                <div class="footer-agileinfo">
                    <div class="col-md-3 col-sm-3 footer-wthree-grid">
                        <h3>Navegação</h3>
                        <ul>
                            <li><a href="<?=home_url();?>">Home</a></li>
                            <li><a href="<?=home_url();?>/portfolio">Portifólio</a></li>
                            <li><a href="<?=home_url();?>/blog">Blog</a></li>
                            <li><a href="<?=home_url();?>/sobre">Sobre</a></li>
                            <li><a href="<?=home_url();?>/contato">Contato</a></li>
                        </ul>
                    </div>
                    <div class="col-md-5 col-sm-5 footer-wthree-grid">
                        <?php
                            $args = array(
                                    'post_type' => 'post',
                                    'numberposts' => 1,
                                    'posts_per_page' => 1,
                                    'order' => 'desc',
                                    'post_status' => 'publish'
                            );

                                $the_query = new WP_Query( $args );
                                 ?>
                                <?php if ( $the_query->have_posts() ) : ?>
                                     <?php

                                    while ( $the_query->have_posts() ) : $the_query->the_post();
                                        ?>
                                            <?php
                                        $idPost   =  get_the_ID();
                                        $conteudo =  get_the_content();
                                        $conteudo = substr($conteudo,0,35);
                                        $titulo   = get_the_title();
                                        $link     = get_permalink($idPost);
                                        $agenda_meta_data = get_post_meta($post->ID);
                                         ?>
                                      <h3>Última Publicação</h3>
                        <div class="agileits-w3layouts-tweets">
                            <h5><i class="fa fa-file-text-o" aria-hidden="true"></i> <?=$titulo?></h5>
                        </div>
                        <p><?=$conteudo?><a href="<?=$link?>">... Leia mais</a></p>
                    </div>
                                          <?php endwhile; ?>

                    <?php endif; ?>


                    <div class="col-md-4 col-sm-4 footer-wthree-grid">
                        <h3>Entre em contato</h3>
                        <div class="ftr-icons">
                        <?php
                            $dadosContato = getDadosPage(10);
                            $telefone = $dadosContato['metadados']['telefone'];
                            $celular = $dadosContato['metadados']['celular'];
                            $endereco = $dadosContato['metadados']['endereco'];
                            $email = $dadosContato['metadados']['email'];

                        ?>
                            <div class="ftr-iblock">
                                <span class="glyphicon glyphicon-map-marker">  </span>
                            </div>
                            <div class="ftr-text">
                                <p><?=$endereco;?></p>
                            </div>
                            <div class="clearfix"> </div>
                       </div>
                       <div class="ftr-icons">
                            <div class="ftr-iblock">
                                <span class="glyphicon glyphicon-earphone">  </span>
                            </div>
                            <div class="ftr-text">
                                <p><?=$telefone . ' - ' . $celular;?></p>
                            </div>
                            <div class="clearfix"> </div>
                       </div>
                       <div class="ftr-icons">
                            <div class="ftr-iblock">
                               <span class="glyphicon glyphicon-envelope">  </span>
                            </div>
                            <div class="ftr-text">
                                <p><a href="mailto:<?=$email?>"><?=$email;?></a></p>
                            </div>
                            <div class="clearfix"> </div>
                       </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //footer end here -->
    <!-- copy rights start here -->
    <div class="copy-right">
        <div class="container">
            <p>© <?= the_time('Y');?> by <?php bloginfo('name'); ?> </p>
        </div>
    </div>
    <!-- //copy right end here -->
    <!-- smooth-scrolling-of-move-up -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
            };
            */

            $().UItoTop({ easingType: 'easeOutQuart' });

        });
    </script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= getHome();?>/js/bootstrap.js"></script>
</body>
</html>