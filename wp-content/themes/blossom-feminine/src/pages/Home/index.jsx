import { Icon, Sidebar, Card, Heading } from "../../components";
import { __ } from '@wordpress/i18n';

const Homepage = () => {
    const cardLists = [
        {
            iconSvg: <Icon icon="site" />,
            heading: __('Site Identity', 'blossom-feminine'),
            buttonText: __('Customize', 'blossom-feminine'),
            buttonUrl: cw_dashboard.custom_logo
        },
        {
            iconSvg: <Icon icon="colorsetting" />,
            heading: __("Color Settings", 'blossom-feminine'),
            buttonText: __('Customize', 'blossom-feminine'),
            buttonUrl: cw_dashboard.colors
        },
        {
            iconSvg: <Icon icon="layoutsetting" />,
            heading: __("Layout Settings", 'blossom-feminine'),
            buttonText: __('Customize', 'blossom-feminine'),
            buttonUrl: cw_dashboard.layout
        },
        {
            iconSvg: <Icon icon="generalsetting" />,
            heading: __("General Settings"),
            buttonText: __('Customize', 'blossom-feminine'),
            buttonUrl: cw_dashboard.general
        },
        {
            iconSvg: <Icon icon="footersetting" />,
            heading: __('Footer Settings', 'blossom-feminine'),
            buttonText: __('Customize', 'blossom-feminine'),
            buttonUrl: cw_dashboard.footer
        }
    ];

    const proSettings = [
        {
            heading: __('Header Layouts', 'blossom-feminine'),
            para: __('Choose from different unique header layouts.', 'blossom-feminine'),
            buttonText: __('Learn More', 'blossom-feminine'),
            buttonUrl: cw_dashboard?.get_pro
        },
        {
            heading: __('Multiple Layouts', 'blossom-feminine'),
            para: __('Choose layouts for blogs, banners, posts and more.', 'blossom-feminine'),
            buttonText: __('Learn More', 'blossom-feminine'),
            buttonUrl: cw_dashboard?.get_pro
        },
        {
            heading: __('Multiple Sidebar', 'blossom-feminine'),
            para: __('Set different sidebars for posts and pages.', 'blossom-feminine'),
            buttonText: "Learn More",
            buttonUrl: cw_dashboard?.get_pro
        },
        {
            heading: __('Top Bar Settings', 'blossom-feminine'),
            para: __('Show a notice or newsletter at the top.', 'blossom-feminine'),
            buttonText: __('Learn More', 'blossom-feminine'),
            buttonUrl: cw_dashboard?.get_pro
        },
        {
            para: __('Boost your website performance with ease.', 'blossom-feminine'),
            heading: __('Performance Settings', 'blossom-feminine'),
            buttonText: __('Learn More', 'blossom-feminine'),
            buttonUrl: cw_dashboard?.get_pro
        },
        {
            para: __('Choose typography for different heading tags.', 'blossom-feminine'),
            heading: __('Typography Settings', 'blossom-feminine'),
            buttonText: __('Learn More', 'blossom-feminine'),
            buttonUrl: cw_dashboard?.get_pro
        },
        {
            para: __('Import the demo content to kickstart your site.', 'blossom-feminine'),
            heading: __('One Click Demo Import', 'blossom-feminine'),
            buttonText: __('Learn More', 'blossom-feminine'),
            buttonUrl: cw_dashboard?.get_pro
        },
    ];

    const sidebarSettings = [
        {
            heading: __('We Value Your Feedback!', 'blossom-feminine'),
            icon: "star",
            para: __("Your review helps us improve and assists others in making informed choices. Share your thoughts today!", 'blossom-feminine'),
            imageurl: <Icon icon="review" />,
            buttonText: __('Leave a Review', 'blossom-feminine'),
            buttonUrl: cw_dashboard.review
        },
        {
            heading: __('Knowledge Base', 'blossom-feminine'),
            para: __("Need help using our theme? Visit our well-organized Knowledge Base!", 'blossom-feminine'),
            imageurl: <Icon icon="documentation" />,
            buttonText: __('Explore', 'blossom-feminine'),
            buttonUrl: cw_dashboard.docmentation
        },
        {
            heading: __('Need Assistance? ', 'blossom-feminine'),
            para: __("If you need help or have any questions, don't hesitate to contact our support team. We're here to assist you!", 'blossom-feminine'),
            imageurl: <Icon icon="supportTwo" />,
            buttonText: __('Submit a Ticket', 'blossom-feminine'),
            buttonUrl: cw_dashboard.support
        }
    ];

    return (
        <>
            <div className="customizer-settings">
                <div className="cw-customizer">
                    <div className="video-section">
                        <div className="cw-settings">
                            <h2>{__('Blossom Feminine Tutorial', 'blossom-feminine')}</h2>
                        </div>
                        <iframe src="https://www.youtube.com/embed/2KJL1v4Bk0s" title={__( 'How To Create a Fashion/Lifestyle/Beauty/Journal/Food Blog| Step-by-Step Tutorial | Blossom Feminine', 'blossom-feminine' )} frameBorder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerPolicy="strict-origin-when-cross-origin" allowFullScreen></iframe>
                    </div>
                    <Heading
                        heading={__( 'Quick Customizer Settings', 'blossom-feminine' )}
                        buttonText={__( 'Go To Customizer', 'blossom-feminine' )}
                        buttonUrl={cw_dashboard?.customizer_url}
                        openInNewTab={true}
                    />
                    <Card
                        cardList={cardLists}
                        cardPlace='customizer'
                        cardCol='three-col'
                    />
                    <Heading
                        heading={__( 'More features with Pro version', 'blossom-feminine' )}
                        buttonText={__( 'Go To Customizer', 'blossom-feminine' )}
                        buttonUrl={cw_dashboard?.customizer_url}
                        openInNewTab={true}
                    />
                    <Card
                        cardList={proSettings}
                        cardPlace='cw-pro'
                        cardCol='two-col'
                    />
                    <div className="cw-button">
                        <a href={cw_dashboard?.get_pro} target="_blank" className="cw-button-btn primary-btn long-button">{__('Learn more about the Pro version', 'blossom-feminine')}</a>
                    </div>
                </div>
                <Sidebar sidebarSettings={sidebarSettings} openInNewTab={true} />
            </div>
        </>
    );
}

export default Homepage;