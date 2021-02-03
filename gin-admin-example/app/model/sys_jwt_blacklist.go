package model

import "gin-admin-example/global"

// JwtBlacklist struct.
type JwtBlacklist struct {
	global.GAE_MODEL
	Jwt string `gorm:"type:text;comment:jwt"`
}
