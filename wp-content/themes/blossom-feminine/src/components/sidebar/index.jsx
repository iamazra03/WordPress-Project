import React from 'react'
import Icon from '../Icon';


const Sidebar = ({sidebarSettings,openInNewTab}) => {

    const sidebarListing = (sidebar) => {
        return sidebar.map((sidebaritem, index) => {
            return (
                <div className="cw-sidebarbody" key={index}>
                    <h3>{sidebaritem.heading}</h3>
                    {sidebaritem.icon && <span><Icon icon={sidebaritem.icon}/></span>}
                    <p>{sidebaritem.para}</p>
                    <div className="cw-button">
                        <a href={sidebaritem.buttonUrl} target={openInNewTab ? "_blank" : "_self"} className="cw-button-btn outline">
                            {sidebaritem.imageurl}
                            {sidebaritem.buttonText}
                            <Icon icon="arrowtwo" />
                        </a>
                    </div>
                </div>
            )
        })
    }

    return (
        <>
            <div className="cw-sidebar">
                <div className="cw-sidebar-list">
                    {
                        sidebarListing(sidebarSettings)
                    }
                </div>
            </div>
        </>
    )
}
export default Sidebar