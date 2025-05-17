import React, { useState, useRef, useEffect } from 'react';
import { __, sprintf } from '@wordpress/i18n';
import { Icon } from '../../components';

function FAQ() {
    const faqContent = [
        {
            title: __( 'What is the difference between Free and Pro?', 'blossom-feminine' ),
            description: (
            <>
                <p>{__( 'Both Free and Pro version of the themes are well-built. However, the Pro version comes with many additional features.', 'blossom-feminine' )}</p>
                <p>{__( 'With the Pro version, you can change the look and feel of your website in seconds. In just a few clicks, you can change the color and typography of your website. The premium version lets you have better control over the theme as it comes with more customization options. Not just that, the theme also has more sections and layout options as compared to the free version. The Pro version is multi-language compatible as well.', 'blossom-feminine' )}</p>
                <p dangerouslySetInnerHTML={{ __html:sprintf(__('Overall, you will have more control over your website with the Pro version. You can find out more about the difference between Free and Pro versions %s.', 'blossom-feminine'), `<a target="_blank" href=${cw_dashboard.get_pro}>here</a>`) }}/>
            </>
            )
        },
        {
            title: __( 'What are the advantages of upgrading to the Premium version?', 'blossom-feminine' ),
            description: __( 'With Premium version, besides the extra features and frequent updates, you get premium support. If you run into any theme issues, you will get a lot quicker response compared to the free support.', 'blossom-feminine' )
        },
        {
            title: __( 'Upgrading to the Pro version- will I lose my changes?', 'blossom-feminine' ),
            description: (
            <>
                <p>{__( 'When you upgrade to the Pro theme, your posts, pages, media, categories, and other data will remain intact-- all your data is saved.', 'blossom-feminine' )}</p>
                <p>{__( 'However, since the Pro version comes with added features and settings, you will need to set up the additional features in the customizer. This process is simple and only takes a few minutes.', 'blossom-feminine' )}</p>
                <p>{__( 'The Pro version is built with lots of flexibility in mind for future upgrades. Therefore, it is slightly different than the free theme but extremely flexible and easy-to-use.', 'blossom-feminine' )}</p>
            </>
            )
        },
        {
            title: __( 'How do I change the copyright text?', 'blossom-feminine' ),
            description: (
                <p dangerouslySetInnerHTML={{ __html:sprintf(__('You can change the copyright text going to %1$s Appearance > Customize > Footer Settings. %2$s However, if you want to hide the author credit text, please %3$s.', 'blossom-feminine'),'<b>','</b>', `<a target="_blank" href=${cw_dashboard.get_pro}>upgrade to the Pro version</a>`) }}/>
            ),
        },
        {
            title: __( 'Why is my theme not working well?', 'blossom-feminine' ),
            description: (
            <>
                <p>{__( 'If your customizer is not loading properly or you are having issues with the theme, it might be due to the plugin conflict.', 'blossom-feminine' )}</p>
                <p dangerouslySetInnerHTML={{ __html:sprintf(__( 'To solve the issue, deactivate all the plugins first, except the ones recommended by the theme. Then, hard reload your website using %1$s "Ctrl+Shift+R" %2$s on Windows. If the issues are fixed, start activating the plugins one by one, and reload and check your site each time. This will help you find out the plugin that is causing the problem.', 'blossom-feminine' ),'<b>','</b>')}} />
                <p dangerouslySetInnerHTML={{ __html:sprintf(__('If this didn\'t help, please %s.', 'blossom-feminine'), `<a target="_blank" href=${cw_dashboard.support}> contact us here</a>`) }}/>
            </>
            )
        },
        {
            title: __( 'How can I solve my issues quickly and get faster support?', 'blossom-feminine' ),
            description: (
            <>
                <p>{__( 'Before you send us a support ticket for any issues, please make sure you have updated the theme to the latest version. We might have fixed the bug in the theme update.', 'blossom-feminine' )}</p>
                <p>{__( 'When you submit the support ticket, please try to provide as much details as possible so that we can solve your problem faster. We recommend you to send us a screenshot(s) with issues explained and your website\'s address (URL). You can contact us ', 'blossom-feminine' )}<a href={cw_dashboard.support} target="_blank">{__('here.', 'blossom-feminine')}</a></p>
                <p>{__( 'Also, you might experience a slower response time during the weekend, so please bear with us.', 'blossom-feminine' )}</p>
            </>

            )
        }
    ];

    const [openIndex, setOpenIndex] = useState(0);
    const [height, setHeight] = useState('0px');
    const contentRef = useRef(null);

    useEffect(() => {
        setHeight(openIndex !== -1 ? `${contentRef.current.scrollHeight}px` : '0px');
    }, [openIndex]);

    const toggleDescription = (index) => {
        setOpenIndex(index === openIndex ? -1 : index);
    };

    return (
        <>
            {faqContent.map((content, index) => (
                <div className="faq-item" key={index}>
                    <div className="faq-title" onClick={() => toggleDescription(index)}>
                        <h2>{content.title}</h2>
                        <span><Icon icon={openIndex === index ? 'minus' : 'plus'} /></span>
                    </div>
                    <div
                        className="faq-description"
                        ref={openIndex === index ? contentRef : null}
                        style={{
                            maxHeight: openIndex === index ? height : '0px',
                            overflow: 'hidden',
                            transition: 'max-height 0.5s ease',
                        }}
                    >
                        {typeof content.description === 'string' ? <p>{content.description}</p> : content.description}
                    </div>
                </div>
            ))}
        </>
    );
}

export default FAQ;
