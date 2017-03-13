jQuery(document).ready(
		function()
		{
		jQuery(".cricket-live-feeds-ap-plugin").load(ap_ls_ajaxURL , "temp" ,

				function()
				{
				jQuery(".cricket-live-score-div .match_body").slideUp();

				jQuery(".match_head").click(
						function(e)
						{

						jQuery(this).next().slideToggle();
						}
						);
				}
				);
		}
		);

