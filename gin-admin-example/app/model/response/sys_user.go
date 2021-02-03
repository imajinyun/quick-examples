package response

import "gin-admin-example/model"

// SysUserResponse struct.
type SysUserResponse struct {
	User model.SysUser `json:"user"`
}

// LoginResponse struct.
type LoginResponse struct {
	User      model.SysUser `json:"user"`
	Token     string        `json:"token"`
	ExpiresAt int64         `json:"expiresAt"`
}
