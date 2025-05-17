import {Icon} from '..'

export default function Heading({heading, buttonText, buttonUrl,openInNewTab}) {
  return (
    <div className="cw-settings">
        <h2>{heading}</h2>
        <div className="cw-button">
            <a href={buttonUrl} className="cw-btn" target={openInNewTab ? "_blank" : "_self"}>
            {buttonText}<Icon icon="arrow"/>
            </a>
        </div>
    </div>
  )
}