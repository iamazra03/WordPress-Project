import { Icon } from "..";
import { __ } from "@wordpress/i18n"

const TabHeader = ({ title }) => {
    const docLinks = [
        {
            name: __('View Website', 'blossom-feminine'),
            link: cw_dashboard.website,
            icon: "globe"
        },
        {
            name: __('View Tutorials ', 'blossom-feminine'),
            link: cw_dashboard.videotutorial,
            icon: "youtube"
        },
        {
            name: __('Contact Support', 'blossom-feminine'),
            link: cw_dashboard.support,
            icon: "support"
        },
        {
            name: __('Docs', 'blossom-feminine'),
            link: cw_dashboard.docmentation,
            icon: "doc"
        }
    ];

    const docLinkListing = () => {
        return docLinks.map((list, index) => (
            <a key={index} href={list.link} target="_blank">
                <Icon icon={list.icon} tooltip={list.name} />
            </a>
        ));
    };

    return (
        <>
            <header className="navbar">
                <h1>{title}</h1>
                <div className="info">
                    <span className="version">
                        {cw_dashboard.theme_version}
                    </span>
                    <div className="doc-links">
                        {docLinkListing()}
                    </div>
                </div>
            </header>

        </>
    )
}

export default TabHeader;
