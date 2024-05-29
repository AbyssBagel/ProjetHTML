import React from 'react'
import PropTypes from 'prop-types'
import Component from '../Component/Component'

const Row = ({ children, justifyContent, alignItems, ...props }) => {
  const defaultProps = Row.defaultProps
  const className = [
    'rpg-row',
    justifyContent !== defaultProps.justifyContent && `rpg-justify-${justifyContent}`,
    alignItems !== defaultProps.alignItems && `rpg-align-${alignItems}`,
  ]
    .filter(Boolean)
    .join(' ')

  return (
    <Component style={[className]} {...props}>
      {children}
    </Component>
  )
}

Row.propTypes = {
  children: PropTypes.node.isRequired,
  justifyContent: PropTypes.string,
  alignItems: PropTypes.string,
}

Row.defaultProps = {
  justifyContent: 'flex-start',
  alignItems: 'stretch',
}

export default Row
