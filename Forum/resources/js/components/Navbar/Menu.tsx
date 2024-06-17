import React, { useState } from 'react'
import { Container, Title, TitleWrapper } from './MenuStyles'
import { FaBars, FaUser, FaSignOutAlt } from 'react-icons/fa'
import Sidebar from '../Sidebar/Sidebar'
import styled from 'styled-components';
import { CgProfile } from "react-icons/cg";

export default function Menu () {
  const [isSidebarActive, setSidebarActive] = useState<boolean>(false);
  const showSiderbar = () => setSidebarActive(!isSidebarActive)

  return (
    <Container>

      <FaBars style={{ position: 'absolute', top: 32, left: 32, color: 'white', cursor: 'pointer' }} onClick={showSiderbar} />

      <TitleWrapper>

        <Title>PokeForum</Title>

      </TitleWrapper>

      {isSidebarActive && <Sidebar isActive={isSidebarActive} setActive={setSidebarActive} />}
      <a href='users/1'>
        <CgProfile style={{ position: 'absolute', top: 32, right: 64, width:40, color: 'white', cursor: 'pointer' }} />
      </a>
      <a href='logout'>
        <FaSignOutAlt style={{ position: 'absolute', top: 32, right: 32, width:40, color: 'white', cursor: 'pointer' }} />
      </a>

      

    </Container>

    

  )
}

