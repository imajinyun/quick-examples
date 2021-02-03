package service

import (
	"errors"
	"gin-admin-example/global"
	"gin-admin-example/model"
	"time"

	"gorm.io/gorm"
)

// JSONInBlacklist func.
func JSONInBlacklist(jwtList model.JwtBlacklist) (err error) {
	err = global.GAE_DB.Create(&jwtList).Error
	return
}

// IsBlacklist func.
func IsBlacklist(jwt string) bool {
	isNotFound := errors.Is(global.GAE_DB.
		Where("jwt = ?", jwt).
		First(&model.JwtBlacklist{}).Error, gorm.ErrRecordNotFound)
	return !isNotFound
}

// GetRedisJWT func.
func GetRedisJWT(userName string) (redisJWT string, err error) {
	redisJWT, err = global.GAE_REDIS.Get(userName).Result()
	return redisJWT, err
}

// SetRedisJWT func.
func SetRedisJWT(jwt string, userName string) (err error) {
	// 此处过期时间等于jwt过期时间
	timer := time.Duration(global.GAE_CONFIG.JWT.ExpiresTime) * time.Second
	err = global.GAE_REDIS.Set(userName, jwt, timer).Err()
	return err
}
