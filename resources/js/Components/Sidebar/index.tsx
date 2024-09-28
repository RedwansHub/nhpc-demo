import React, { useEffect, useRef, useState } from 'react';
import { NavLink, useLocation } from 'react-router-dom';
import SidebarLinkGroup from './SidebarLinkGroup';
import Logo from '../../../images/logo/logo.svg';

interface SidebarProps {
    sidebarOpen: boolean;
    setSidebarOpen: (isOpen: boolean) => void;
}

const Sidebar = ({ sidebarOpen, setSidebarOpen }: SidebarProps) => {
    const location = useLocation();
    const { pathname } = location;

    const triggerRef = useRef<HTMLButtonElement>(null);
    const sidebarRef = useRef<HTMLDivElement>(null);

    const [sidebarExpanded, setSidebarExpanded] = useState(
        localStorage.getItem('sidebar-expanded') === 'true'
    );

    // Effect to handle outside click and escape key press for sidebar
    useEffect(() => {
        const handleOutsideClick = (e: MouseEvent) => {
            if (
                !sidebarOpen ||
                sidebarRef.current?.contains(e.target as Node) ||
                triggerRef.current?.contains(e.target as Node)
            )
                return;
            setSidebarOpen(false);
        };

        const handleKeyPress = (e: KeyboardEvent) => {
            if (e.key === 'Escape' && sidebarOpen) setSidebarOpen(false);
        };

        document.addEventListener('click', handleOutsideClick);
        document.addEventListener('keydown', handleKeyPress);
        return () => {
            document.removeEventListener('click', handleOutsideClick);
            document.removeEventListener('keydown', handleKeyPress);
        };
    }, [sidebarOpen, setSidebarOpen]);

    // Effect to handle localStorage updates
    useEffect(() => {
        localStorage.setItem('sidebar-expanded', String(sidebarExpanded));
        document.body.classList.toggle('sidebar-expanded', sidebarExpanded);
    }, [sidebarExpanded]);

    // Reusable sidebar item
    const SidebarItem = ({
                             to,
                             label,
                             svgPath,
                             active,
                         }: {
        to: string;
        label: string;
        svgPath: string;
        active: boolean;
    }) => (
        <NavLink
            to={to}
            className={`group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 ${
                active ? 'bg-graydark dark:bg-meta-4' : ''
            }`}
            onClick={(e) => {
                e.preventDefault();
                sidebarExpanded ? setSidebarExpanded(!sidebarExpanded) : setSidebarExpanded(true);
            }}
        >
            <svg className="fill-current" width="18" height="18" viewBox="0 0 18 18">
                <path d={svgPath} />
            </svg>
            {label}
        </NavLink>
    );

    return (
        <aside
            ref={sidebarRef}
            className={`absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0 ${
                sidebarOpen ? 'translate-x-0' : '-translate-x-full'
            }`}
        >
            {/* Sidebar Header */}
            <div className="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
                <NavLink to="/">
                    <img src={Logo} alt="Logo" />
                </NavLink>
                <button
                    ref={triggerRef}
                    onClick={() => setSidebarOpen(!sidebarOpen)}
                    aria-controls="sidebar"
                    aria-expanded={sidebarOpen}
                    className="block lg:hidden"
                >
                    <svg
                        className="fill-current"
                        width="20"
                        height="18"
                        viewBox="0 0 20 18"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z" />
                    </svg>
                </button>
            </div>

            {/* Sidebar Navigation */}
            <nav className="mt-5 py-4 px-4 lg:mt-9 lg:px-6">
                <h3 className="mb-4 ml-4 text-sm font-semibold text-bodydark2">MENU</h3>
                <ul className="mb-6 flex flex-col gap-1.5">
                    <SidebarLinkGroup
                        activeCondition={pathname === '/' || pathname.includes('dashboard')}
                    >
                        {(handleClick, open) => (
                            <SidebarItem
                                to="#"
                                label="Dashboard"
                                svgPath="M6.10322 0.956299H2.53135C1.5751 0.956299 0.787598 1.7438 0.787598 2.70005V6.27192C0.787598 7.22817 1.5751 8.01567 2.53135 8.01567H6.10322C7.05947 8.01567 7.84697 7.22817 7.84697 6.27192V2.72817C7.8751 1.7438 7.0876 0.956299 6.10322 0.956299Z"
                                active={pathname === '/' || pathname.includes('dashboard')}
                            />
                        )}
                    </SidebarLinkGroup>
                    {/* Repeat for other menu items */}
                </ul>
            </nav>
        </aside>
    );
};

export default Sidebar;
