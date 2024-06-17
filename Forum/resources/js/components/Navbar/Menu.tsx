import React, { useState } from 'react'
import { Container } from './MenuStyles'
import { FaBars } from 'react-icons/fa'
import Sidebar from '../Sidebar/Sidebar'


export default function Menu () {
  const [isSidebarActive, setSidebarActive] = useState<boolean>(false);
  const showSiderbar = () => setSidebarActive(!isSidebarActive)

  return (
    <Container>
      <FaBars onClick={showSiderbar} />
      {isSidebarActive && <Sidebar isActive={isSidebarActive} setActive={setSidebarActive} />}
    </Container>
  )
}

