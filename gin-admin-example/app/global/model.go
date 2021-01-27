package global

import (
	"time"

	"gorm.io/gorm"
)

// GAE_MODEL struct.
type GAE_MODEL struct {
	ID        uint `gorm:"primarykey"`
	CreatedAt time.Time
	UpdatedAt time.Time
	DeletedAt gorm.DeletedAt `gorm:"index" json:"-"`
}
