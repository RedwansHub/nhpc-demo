// src/components/ThemeToggle.tsx
import React from 'react';
import useTheme from '../../Hooks/useTheme';

const ThemeToggle: React.FC = () => {
    const { theme, toggleTheme } = useTheme();

    return (
        <button
            onClick={toggleTheme}
            className={`p-2 rounded ${theme === 'dark' ? 'bg-gray-800 text-white' : 'bg-gray-200 text-black'}`}
        >
            {theme === 'dark' ? '🌙 Dark Mode' : '☀️ Light Mode'}
        </button>
    );
};

export default ThemeToggle;
