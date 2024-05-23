<?php 
include dirname(__FILE__).'/variables.php'; ?>

<!-- Block: <?php echo $block_title.' - '.$block_name; ?> -->

<?php
if( is_admin() ){ // Block Hover preview
    $prev_path = dirname(__FILE__).'/preview/';
    $prev_file = glob($prev_path."*.{jpg,jpeg,png,svg}", GLOB_BRACE);
    echo '<center><img style="max-width: 100%; margin:0 auto;" src="'.get_stylesheet_directory_uri().'/includes/basetheme-blocks-handler/blocks/'.$block_name.'/preview/'.basename($prev_file[0]).'"></center>';
    return false;
}

$classes = ['block_'.$block_name.' relative'];
if( !empty( $block['className'] ) )
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) );

$anchor = '';
if( !empty( $block['anchor'] ) )
	$anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';
?>

<?php 
echo '<div class="' . join( ' ', $classes ) . '"' . $anchor . '>'; 

// Usually, you don't have to edit any code above.

// **************************
// Template code STARTS here 
// **************************

// ACF Fields Here -----------
if( !empty( get_field('block_hero_image') ) ){
  $field = get_field('block_hero_image');
}
?>

  <?php if($field['parallax_on_scroll']){ ?>
  <!-- Parallax -->
  <div class="relative min-h-screen h-full z-10 flex flex-wrap justify-center content-center bg-cover bg-fixed bg-no-repeat bg-center" style="background-image:url('<?php echo $field['hero_image']['url']; ?>');">
  
  <?php }else{ ?>
  <!-- Not Parallax -->
  <div class="relative min-h-screen h-full z-10 flex flex-wrap justify-center content-center bg-cover bg-no-repeat bg-center" style="background-image:url('<?php echo $field['hero_image']['url']; ?>');">
  <?php } ?>

		<!-- Caption -->
    <!-- <div class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 w-full z-10 text-white max-w-898px mx-auto container"> -->
    <div class="z-10 relative text-white max-w-898px mx-auto container min-h-500 py-10 md:py-24 mt-14">
      <div class="relative flex flex-wrap justify-center content-center lg:-mx-10">

        <div class="relative w-full">
          <div class="text-center relative pb-6">
            <?php if($field['heading']): ?> <h1 class="text-2xl sm:text-3xl lg:text-4xl leading-10 lg:leading-54"><?php echo $field['heading']; ?></h1> <?php endif; ?>
          </div>
        </div>

        <div class="text-center md:pt-7 w-full">
          <div class="relative">
            <?php if($field['label']): ?> <p class="text-sm"><?php echo $field['label']; ?></p> <?php endif; ?>
          </div>
        </div>
        
        <div class="flex flex-wrap items-center justify-center w-full">
          <?php if( $field['button_1'] ){ ?>
            <a class="flex flex-wrap items-center justify-center px-6 py-4 text-white mt-12 md:mt-24 mx-2 underline underline-offset-8 order-2 md:order-1" target="<?php echo $field['button_1']['target']; ?>" href="<?php echo $field['button_1']['url']; ?>"><?php echo $field['button_1']['title']; ?></a>
          <?php } ?>

          <?php if( $field['button_2'] ){ ?>
            <a class="flex flex-wrap items-center justify-center px-8 py-3 text-dark border-white border bg-white mt-12 md:mt-24 mx-2 order-1 md:order-2" target="<?php echo $field['button_2']['target']; ?>" href="<?php echo $field['button_2']['url']; ?>">
              <?php echo $field['button_2']['title']; ?>
              <svg class="ml-3" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2.52571 13.314C2.54519 13.3961 2.58109 13.4735 2.63126 13.5414C2.68142 13.6093 2.7448 13.6664 2.8176 13.7092C2.89039 13.752 2.97108 13.7796 3.05483 13.7904C3.13857 13.8012 3.22363 13.7949 3.30489 13.772C7.03061 12.7433 10.9654 12.7429 14.6913 13.7709C14.7725 13.7938 14.8576 13.8 14.9413 13.7893C15.025 13.7785 15.1056 13.7509 15.1784 13.7081C15.2512 13.6653 15.3146 13.6083 15.3647 13.5404C15.4149 13.4725 15.4508 13.3952 15.4703 13.3131L17.4616 4.85085C17.4883 4.73756 17.4828 4.61908 17.4457 4.50876C17.4087 4.39843 17.3416 4.30063 17.252 4.22639C17.1623 4.15214 17.0538 4.1044 16.9385 4.08852C16.8232 4.07265 16.7057 4.08929 16.5994 4.13655L12.6475 5.89293C12.5048 5.95635 12.3436 5.96406 12.1955 5.91453C12.0474 5.86501 11.9232 5.76183 11.8474 5.62533L9.54638 1.48358C9.49225 1.38615 9.41305 1.30496 9.31699 1.24844C9.22092 1.19192 9.11149 1.16211 9.00003 1.16211C8.88857 1.16211 8.77914 1.19192 8.68308 1.24844C8.58701 1.30496 8.50781 1.38615 8.45368 1.48358L6.15272 5.62533C6.07688 5.76183 5.95269 5.865 5.8046 5.91453C5.6565 5.96406 5.49523 5.95635 5.35253 5.89293L1.40008 4.13629C1.29375 4.08903 1.17634 4.07239 1.06107 4.08825C0.945794 4.10411 0.837237 4.15183 0.747618 4.22604C0.657998 4.30025 0.590875 4.39801 0.553806 4.5083C0.516736 4.6186 0.511192 4.73705 0.537798 4.85033L2.52571 13.314Z" stroke="#1D1D1B" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
          <?php } ?>
        </div>

      </div>
    </div>
		
		<!-- <div class="absolute left-1/2 transform -translate-x-2/4 bottom-8 z-10 text-center">
			<p class="text-primary">Scroll down</p>
			<img class="pt-5 inline-block" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scrolldown-icon.svg">
		</div> -->
		
		<!-- Overlay -->
		<div class="home-bg-vid-backdop lg:rounded-5xl min-h-screen h-full absolute top-0 left-0 w-full bg-black bg-opacity-50"></div>

	</div>

<?php 
// **************************
// Template code ENDS here
// **************************
echo '</div>'; 
?>