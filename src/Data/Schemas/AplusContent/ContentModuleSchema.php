<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ContentModuleSchema extends BaseSchema
{
    public function __construct(
        public ?string $content_module_type = null,
        public ?StandardCompanyLogoModuleSchema $standard_company_logo = null,
        public ?StandardComparisonTableModuleSchema $standard_comparison_table = null,
        public ?StandardFourImageTextModuleSchema $standard_four_image_text = null,
        public ?StandardFourImageTextQuadrantModuleSchema $standard_four_image_text_quadrant = null,
        public ?StandardHeaderImageTextModuleSchema $standard_header_image_text = null,
        public ?StandardImageSidebarModuleSchema $standard_image_sidebar = null,
        public ?StandardImageTextOverlayModuleSchema $standard_image_text_overlay = null,
        public ?StandardMultipleImageTextModuleSchema $standard_multiple_image_text = null,
        public ?StandardProductDescriptionModuleSchema $standard_product_description = null,
        public ?StandardSingleImageHighlightsModuleSchema $standard_single_image_highlights = null,
        public ?StandardSingleImageSpecsDetailModuleSchema $standard_single_image_specs_detail = null,
        public ?StandardSingleSideImageModuleSchema $standard_single_side_image = null,
        public ?StandardTechSpecsModuleSchema $standard_tech_specs = null,
        public ?StandardTextModuleSchema $standard_text = null,
        public ?StandardThreeImageTextModuleSchema $standard_three_image_text = null,
    ) {}
}
