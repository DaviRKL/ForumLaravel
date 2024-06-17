import React from 'react'
import { Container } from './SidebarItem'

interface SidebarItemProps {
  Icon: React.ComponentType;
  Text: string;
}

export const SidebarItem: React.FC<SidebarItemProps> = ({ Icon, Text }) => {
  return (
    <Container>
      <Icon />
      <span>{Text}</span>
    </Container>
  );
}

export const SidebarItem2: React.FC<SidebarItemProps> = ({ Icon, Text }) => {
  return (
    <Container>
      <Icon />
      <span>{Text}</span>
    </Container>
  );
}

 

