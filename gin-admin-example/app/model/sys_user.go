package model

import (
	"gin-admin-example/global"

	uuid "github.com/satori/go.uuid"
)

// SysUser struct.
type SysUser struct {
	global.GAE_MODEL
	UUID        uuid.UUID    `json:"uuid" gorm:"comment:用户UUID"`
	Username    string       `json:"userName" gorm:"comment:用户登录名"`
	Password    string       `json:"-"  gorm:"comment:用户登录密码"`
	NickName    string       `json:"nickName" gorm:"default:系统用户;comment:用户昵称" `
	HeaderImg   string       `json:"headerImg" gorm:"default:http://baidu.com/a.png;comment:用户头像"`
	Authority   SysAuthority `json:"authority" gorm:"foreignKey:AuthorityID;references:AuthorityID;comment:用户角色"`
	AuthorityID string       `json:"authorityId" gorm:"default:888;comment:用户角色ID"`
}
