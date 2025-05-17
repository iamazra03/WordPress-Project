import { Icon, Card, } from "../../components";
import { __ } from "@wordpress/i18n";
import { mainDemo, demo2, demo3, demo4, demo5, demo6, demo7, demo8, demo9, demo10, demo11, } from "../../components/images";

const StarterSites = () => {
    const cardList = [
        {
            heading: __('Blossom Feminine Pro', 'blossom-feminine'),
            imageurl: mainDemo,
            buttonUrl: __('https://blossomthemesdemo.com/blossom-feminine-pro/', 'blossom-feminine'),
        },
        {
            heading: __('Blossom Feminine Pro (Modern)', 'blossom-feminine'),
            imageurl: demo2,
            buttonUrl: __('https://blossomthemesdemo.com/blossom-feminine-pro-modern/', 'blossom-feminine'),
        },
        {
            heading: __('Traveller Blog (Gutenberg)', 'blossom-feminine'),
            imageurl: demo3,
            buttonUrl: __('https://blossomthemesdemo.com/blossom-feminine-pro-traveller-blog/', 'blossom-feminine'),
        },
        {
            heading: __('DIY Blog (Gutenberg)', 'blossom-feminine'),
            imageurl: demo4,
            buttonUrl: __('https://blossomthemesdemo.com/blossom-feminine-pro-diy-blog/', 'blossom-feminine'),
        },
        {
            heading: __('Fashion Blog (Gutenberg)', 'blossom-feminine'),
            imageurl: demo5,
            buttonUrl: __('https://blossomthemesdemo.com/blossom-feminine-pro-fashion-blog/', 'blossom-feminine'),
        },
        {
            heading: __('Minimal Blog (Gutenberg)', 'blossom-feminine'),
            imageurl: demo6,
            buttonUrl: __('https://blossomthemesdemo.com/blossom-feminine-pro-minimal-blog/', 'blossom-feminine'),
        },
        {
            heading: __('Magazine Blog (Gutenberg)', 'blossom-feminine'),
            imageurl: demo7,
            buttonUrl: __('https://blossomthemesdemo.com/blossom-feminine-pro-magazine-blog/', 'blossom-feminine'),
        },
        {
            heading: __('Beauty Pro', 'blossom-feminine'),
            imageurl: demo8,
            buttonUrl: __('https://blossomthemesdemo.com/feminine-pro-beauty/', 'blossom-feminine'),
        },
        {
            heading: __('Chic Pro', 'blossom-feminine'),
            imageurl: demo9,
            buttonUrl: __('https://blossomthemesdemo.com/feminine-pro-chic/', 'blossom-feminine'),
        },
        {
            heading: __('Diva Pro', 'blossom-feminine'),
            imageurl: demo10,
            buttonUrl: __('https://blossomthemesdemo.com/feminine-pro-diva/', 'blossom-feminine'),
        },
        {
            heading: __('Mommy Blog Pro', 'blossom-feminine'),
            imageurl: demo11,
            buttonUrl: __('https://blossomthemesdemo.com/feminine-pro-mommy/', 'blossom-feminine'),
        },

    ]
    return (
        <>
            <Card
                cardList={cardList}
                cardPlace='starter'
                cardCol='three-col'
            />
            <div className="starter-sites-button cw-button">
                <a href={__('https://blossomthemes.com/theme-demo/?theme=blossom-feminine-pro&utm_source=blossom_feminine&utm_medium=dashboard&utm_campaign=theme_demo', 'blossom-feminine')} target="_blank" className="cw-button-btn outline">
                    {__('View All Demos', 'blossom-feminine')}
                    <Icon icon="arrowtwo" />
                </a>
            </div>
        </>
    );
}

export default StarterSites;