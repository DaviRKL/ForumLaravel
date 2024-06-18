import React from 'react'
import { StyledFooter } from './FooterStyle';
import { FaLinkedin, FaGithub } from "react-icons/fa";
import { BiLogoGmail } from "react-icons/bi";

export default function Footer() {

    return (
        <StyledFooter>
            <div className="container">
                <ul className="list-inline">
                    <li className="list-inline-item">
                        <a href="https://www.linkedin.com/in/davi-ryan-konuma-lima-62b00221b/" target="_blank" rel="noopener noreferrer">
                            <FaLinkedin />
                        </a>
                    </li>
                    <li className="list-inline-item">
                        <a href="https://github.com/DaviRKL" target="_blank" rel="noopener noreferrer">
                            <FaGithub />
                        </a>
                    </li>
                    <li className="list-inline-item">
                        <a href="mailto:davirkl07@gmail.com">
                            <BiLogoGmail />
                        </a>
                    </li>
                </ul>
                <p>&copy; 2024 Davi Ryan Konuma Lima</p>
            </div>
        </StyledFooter>

    )
}
