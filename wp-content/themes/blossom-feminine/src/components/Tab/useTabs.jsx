import { useRef, useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';

function useTabs(initialTabs, initialActiveTab = 0, onChange) {
  const tabsRef = useRef(initialTabs);
  const [activeTab, setActiveTab] = useState(initialActiveTab);
  const navigate = useNavigate();

  const handleTabClick = (index) => {
    if (index !== activeTab) {
      setActiveTab(index);
      const newHash = tabsRef.current[index].title.toLowerCase().replace(/ /g, "-");
      if (onChange) {
        onChange(tabsRef.current[index].title);
      }
      navigate(`/wp-admin/themes.php?page=blossom-feminine-dashboard#${newHash}`);
    }
  };

  const checkHash = () => {
    const hash = window.location.hash.substring(1);
    const tabIndex = tabsRef.current.findIndex(
      (tab) => tab.title.toLowerCase().replace(/ /g, "-") === hash
    );
    if (tabIndex !== -1 && tabIndex !== activeTab) {
      setActiveTab(tabIndex);
      if (onChange) {
        onChange(tabsRef.current[tabIndex].title);
      }
    }
  };

  useEffect(() => {
    checkHash();
    window.addEventListener('hashchange', checkHash);
    return () => {
      window.removeEventListener('hashchange', checkHash);
    };
  }, []);

  const renderTabs = () => {
    return tabsRef.current.map((tab, index) => (
      <button
        key={index}
        onClick={() => handleTabClick(index)}
        className={activeTab === index ? 'active-tab' : ''}
      >
        {tab.icon}
        {tab.title}
      </button>
    ));
  };

  const renderContent = () => {
    return tabsRef.current[activeTab].content;
  };

  return { renderTabs, renderContent };
}

export default useTabs;
